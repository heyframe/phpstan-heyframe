<?php

declare(strict_types=1);

namespace HeyFrame\Tests\Rule\BestPractise\fixtures\DALDefinitionRule;

use HeyFrame\Core\Framework\DataAbstractionLayer\Entity;
use HeyFrame\Core\Framework\DataAbstractionLayer\EntityDefinition;
use HeyFrame\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use HeyFrame\Core\Framework\DataAbstractionLayer\Field\IdField;
use HeyFrame\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use HeyFrame\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use HeyFrame\Core\Framework\DataAbstractionLayer\FieldCollection;
use HeyFrame\Core\Framework\DataAbstractionLayer\Field\StringField;

class FooDefinition extends EntityDefinition
{
    public function getEntityName(): string
    {
        return 'foo';
    }

    public function getEntityClass(): string
    {
        return FooEntity::class;
    }

    public function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),

            new StringField('name', 'name'),
        ]);
    }
}

class FooEntity extends Entity
{
    use EntityIdTrait;

    protected string $name;
}
