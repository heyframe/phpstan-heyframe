<?php

declare(strict_types=1);

namespace HeyFrame\PhpStan\Tests\Rule;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use HeyFrame\PhpStan\Rule\ForbidLocalDiskWriteRule;

/**
 * @internal
 *
 * @extends RuleTestCase<ForbidLocalDiskWriteRule>
 */
class ForbidLocalDiskWriteRuleTest extends RuleTestCase
{
    public function testAnalyse(): void
    {
        $this->analyse([__DIR__ . '/fixtures/ForbidLocalDiskWriteRule/file-put-contents.php'], [
            [
                "Usage of file_put_contents is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                5,
            ],
            [
                "Usage of file_put_contents is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                7,
            ],
            [
                "Usage of file_put_contents is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                9,
            ],
            [
                "Usage of fopen with write mode is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                25,
            ],
            [
                "Usage of fopen with write mode is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                28,
            ],
            [
                "Usage of fopen with write mode is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                31,
            ],
            [
                "Usage of ZipArchive::open with create mode is forbidden. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                44,
            ],
            [
                "Usage of ZipArchive::open with create mode is forbidden. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                47,
            ],
            [
                "Usage of symlink is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                59,
            ],
            [
                "Usage of symlink is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                62,
            ],
            [
                "Usage of mkdir is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                71,
            ],
            [
                "Usage of rmdir is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                74,
            ],
            [
                "Usage of unlink is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                77,
            ],
            [
                "Usage of rename is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                80,
            ],
            [
                "Usage of Symfony Filesystem::dumpFile is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                107,
            ],
            [
                "Usage of Symfony Filesystem::mkdir is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                108,
            ],
            [
                "Usage of Symfony Filesystem::remove is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                109,
            ],
            [
                "Usage of Symfony Filesystem::copy is forbidden to local files. Use temporary directory with sys_get_temp_dir() if needed.\n    💡 Use flysystem instead https://developer.heyframe.com/docs/guides/plugins/plugins/framework/filesystem/filesystem.html",
                110,
            ],
        ]);
    }

    protected function getRule(): Rule
    {
        return new ForbidLocalDiskWriteRule();
    }
}
