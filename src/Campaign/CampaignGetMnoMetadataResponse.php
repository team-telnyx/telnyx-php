<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Campaign\CampaignGetMnoMetadataResponse\v10999;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type campaign_get_mno_metadata_response = array{_10999?: v10999}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class CampaignGetMnoMetadataResponse implements BaseModel
{
    /** @use SdkModel<campaign_get_mno_metadata_response> */
    use SdkModel;

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
