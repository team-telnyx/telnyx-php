<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Campaign\CampaignGetMnoMetadataResponse\v10999;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type campaign_get_mno_metadata_response = array{_10999?: v10999}
 */
final class CampaignGetMnoMetadataResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<campaign_get_mno_metadata_response> */
    use SdkModel;

    use SdkResponse;

    #[Api('10999', optional: true)]
    public ?v10999 $_10999;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?v10999 $_10999 = null): self
    {
        $obj = new self;

        null !== $_10999 && $obj->_10999 = $_10999;

        return $obj;
    }

    public function with10999(v10999 $_10999): self
    {
        $obj = clone $this;
        $obj->_10999 = $_10999;

        return $obj;
    }
}
