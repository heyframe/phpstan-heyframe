<?php

declare(strict_types=1);

namespace HeyFrame\PhpStan\Rule;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\Type\ObjectType;
use HeyFrame\Core\System\Channel\ChannelContext;
use HeyFrame\Core\System\SystemConfig\SystemConfigService;

/**
 * @implements Rule<MethodCall>
 */
class ForwardChannelContextToSystemConfigServiceRule implements Rule
{
    public function getNodeType(): string
    {
        return MethodCall::class;
    }

    /**
     * @param MethodCall $node
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if ($this->shouldBeSkipped($node, $scope)) {
            return [];
        }

        $channelContextVarName = null;

        foreach ($scope->getDefinedVariables() as $variableName) {
            $variableType = $scope->getVariableType($variableName);
            if ((new ObjectType(ChannelContext::class))->isSuperTypeOf($variableType)->yes()) {
                $channelContextVarName = $variableName;
                break;
            }
        }

        if ($channelContextVarName === null) {
            return [];
        }

        if (!isset($node->getArgs()[1])) {
            return [
                RuleErrorBuilder::message('SystemConfigService methods expects a channelId as second parameter. When a method gets a ChannelContext passed and that parameter is not forwarded to SystemConfigService we should throw an phpstan error')
                    ->identifier('heyframe.forwardChannelContext')
                    ->build(),
            ];
        }

        $channelId = $node->getArgs()[1]->value;

        if ($channelId instanceof MethodCall
            && $channelId->var instanceof Node\Expr\Variable
            && $channelId->var->name === $channelContextVarName
            && $channelId->name instanceof Identifier
            && $channelId->name->name === 'getChannelId'
        ) {
            return [];
        }

        if ($channelId instanceof MethodCall
            && $channelId->var instanceof MethodCall
            && $channelId->var->var instanceof Node\Expr\Variable
            && $channelId->var->var->name === $channelContextVarName
            && $channelId->var->name instanceof Identifier
            && $channelId->var->name->name === 'getChannel'
            && $channelId->name instanceof Identifier
            && $channelId->name->name === 'getId'
        ) {
            return [];
        }

        return [
            RuleErrorBuilder::message('SystemConfigService methods expects a channelId as second parameter. When a method gets a ChannelContext passed and that parameter is not forwarded to SystemConfigService we should throw an phpstan error')
                ->identifier('heyframe.forwardChannelContext')
                ->build(),
        ];
    }

    private function shouldBeSkipped(MethodCall $node, Scope $scope): bool
    {
        $type = $scope->getType($node->var);

        if (!(new ObjectType(SystemConfigService::class))->isSuperTypeOf($type)->yes()) {
            return true;
        }

        if (!$node->name instanceof Node\Identifier) {
            return true;
        }

        $methodName = $node->name->toString();
        if (!in_array($methodName, ['get', 'getString', 'getInt', 'getFloat', 'getBool'], true)) {
            return true;
        }

        return false;
    }
}
