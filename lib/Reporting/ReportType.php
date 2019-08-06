<?php

namespace Telnyx\Reporting;

/**
 * Class ReportType
 *
 * @property string $id
 * @property string $object
 * @property int $data_available_end
 * @property int $data_available_start
 * @property string $name
 * @property int $updated
 * @property string $version
 *
 * @package Telnyx\Reporting
 */
class ReportType extends \Telnyx\ApiResource
{
    const OBJECT_NAME = "reporting.report_type";

    use \Telnyx\ApiOperations\All;
    use \Telnyx\ApiOperations\Retrieve;
}
