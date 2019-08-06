<?php

namespace Telnyx\Reporting;

/**
 * Class ReportRun
 *
 * @property string $id
 * @property string $object
 * @property int $created
 * @property string $error
 * @property bool $livemode
 * @property mixed $parameters
 * @property string $report_type
 * @property mixed $result
 * @property string $status
 * @property int $succeeded_at
 *
 * @package Telnyx\Reporting
 */
class ReportRun extends \Telnyx\ApiResource
{
    const OBJECT_NAME = "reporting.report_run";

    use \Telnyx\ApiOperations\All;
    use \Telnyx\ApiOperations\Create;
    use \Telnyx\ApiOperations\Retrieve;
}
