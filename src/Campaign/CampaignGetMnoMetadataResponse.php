<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Campaign\CampaignGetMnoMetadataResponse\mno_10999;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CampaignGetMnoMetadataResponseShape = array{
 *   _10999?: mno_10999|null
 * }
 */
final class CampaignGetMnoMetadataResponse implements BaseModel
{
    /** @use SdkModel<CampaignGetMnoMetadataResponseShape> */
    use SdkModel;

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
     *
     * @param mno_10999|array{
     *   minMsgSamples: int,
     *   mno: string,
     *   mnoReview: bool,
     *   mnoSupport: bool,
     *   noEmbeddedLink: bool,
     *   noEmbeddedPhone: bool,
     *   qualify: bool,
     *   reqSubscriberHelp: bool,
     *   reqSubscriberOptin: bool,
     *   reqSubscriberOptout: bool,
     * } $_10999
     */
    public static function with(mno_10999|array|null $_10999 = null): self
    {
        $obj = new self;

        null !== $_10999 && $obj['_10999'] = $_10999;

        return $obj;
    }

    /**
     * @param mno_10999|array{
     *   minMsgSamples: int,
     *   mno: string,
     *   mnoReview: bool,
     *   mnoSupport: bool,
     *   noEmbeddedLink: bool,
     *   noEmbeddedPhone: bool,
     *   qualify: bool,
     *   reqSubscriberHelp: bool,
     *   reqSubscriberOptin: bool,
     *   reqSubscriberOptout: bool,
     * } $_10999
     */
    public function with10999(mno_10999|array $_10999): self
    {
        $obj = clone $this;
        $obj['_10999'] = $_10999;

        return $obj;
    }
}
