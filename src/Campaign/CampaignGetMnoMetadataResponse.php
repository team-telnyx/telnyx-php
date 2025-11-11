<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Campaign\CampaignGetMnoMetadataResponse\mno_10999;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CampaignGetMnoMetadataResponseShape = array{
 *   _10999?: mno_10999|null
 * }
 */
final class CampaignGetMnoMetadataResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CampaignGetMnoMetadataResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api('10999', optional: true)]
    public ?mno_10999 $_10999;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?mno_10999 $_10999 = null): self
    {
        $obj = new self;

        null !== $_10999 && $obj->_10999 = $_10999;

        return $obj;
    }

    public function with10999(mno_10999 $v10999): self
    {
        $obj = clone $this;
        $obj->_10999 = $v10999;

        return $obj;
    }
}
