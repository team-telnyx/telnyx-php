<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberWithMessagingSettings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingFeatureSet;

/**
 * @phpstan-type features_alias = array{
 *   mms?: MessagingFeatureSet|null, sms?: MessagingFeatureSet|null
 * }
 */
final class Features implements BaseModel
{
    /** @use SdkModel<features_alias> */
    use SdkModel;

    /**
     * The set of features available for a specific messaging use case (SMS or MMS). Features
     * can vary depending on the characteristics the phone number, as well as its current
     * product configuration.
     */
    #[Api(nullable: true, optional: true)]
    public ?MessagingFeatureSet $mms;

    /**
     * The set of features available for a specific messaging use case (SMS or MMS). Features
     * can vary depending on the characteristics the phone number, as well as its current
     * product configuration.
     */
    #[Api(nullable: true, optional: true)]
    public ?MessagingFeatureSet $sms;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?MessagingFeatureSet $mms = null,
        ?MessagingFeatureSet $sms = null
    ): self {
        $obj = new self;

        null !== $mms && $obj->mms = $mms;
        null !== $sms && $obj->sms = $sms;

        return $obj;
    }

    /**
     * The set of features available for a specific messaging use case (SMS or MMS). Features
     * can vary depending on the characteristics the phone number, as well as its current
     * product configuration.
     */
    public function withMms(?MessagingFeatureSet $mms): self
    {
        $obj = clone $this;
        $obj->mms = $mms;

        return $obj;
    }

    /**
     * The set of features available for a specific messaging use case (SMS or MMS). Features
     * can vary depending on the characteristics the phone number, as well as its current
     * product configuration.
     */
    public function withSMS(?MessagingFeatureSet $sms): self
    {
        $obj = clone $this;
        $obj->sms = $sms;

        return $obj;
    }
}
