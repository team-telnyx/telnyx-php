<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\Campaign;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging10dlc\Campaign\CampaignGetMnoMetadataResponse\Mno10999;

/**
 * @phpstan-type CampaignGetMnoMetadataResponseShape = array{
 *   _10999?: Mno10999|null
 * }
 */
final class CampaignGetMnoMetadataResponse implements BaseModel
{
    /** @use SdkModel<CampaignGetMnoMetadataResponseShape> */
    use SdkModel;

    #[Optional('10999')]
    public ?Mno10999 $_10999;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Mno10999|array{
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
    public static function with(Mno10999|array|null $_10999 = null): self
    {
        $self = new self;

        null !== $_10999 && $self['_10999'] = $_10999;

        return $self;
    }

    /**
     * @param Mno10999|array{
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
    public function with10999(Mno10999|array $_10999): self
    {
        $self = clone $this;
        $self['_10999'] = $_10999;

        return $self;
    }
}
