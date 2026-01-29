<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberWithMessagingSettings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingFeatureSet;

/**
 * @phpstan-import-type MessagingFeatureSetShape from \Telnyx\MessagingFeatureSet
 *
 * @phpstan-type FeaturesShape = array{
 *   mms?: null|MessagingFeatureSet|MessagingFeatureSetShape,
 *   sms?: null|MessagingFeatureSet|MessagingFeatureSetShape,
 * }
 */
final class Features implements BaseModel
{
    /** @use SdkModel<FeaturesShape> */
    use SdkModel;

    /**
     * The set of features available for a specific messaging use case (SMS or MMS). Features
     * can vary depending on the characteristics the phone number, as well as its current
     * product configuration.
     */
    #[Optional(nullable: true)]
    public ?MessagingFeatureSet $mms;

    /**
     * The set of features available for a specific messaging use case (SMS or MMS). Features
     * can vary depending on the characteristics the phone number, as well as its current
     * product configuration.
     */
    #[Optional(nullable: true)]
    public ?MessagingFeatureSet $sms;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MessagingFeatureSet|MessagingFeatureSetShape|null $mms
     * @param MessagingFeatureSet|MessagingFeatureSetShape|null $sms
     */
    public static function with(
        MessagingFeatureSet|array|null $mms = null,
        MessagingFeatureSet|array|null $sms = null,
    ): self {
        $self = new self;

        null !== $mms && $self['mms'] = $mms;
        null !== $sms && $self['sms'] = $sms;

        return $self;
    }

    /**
     * The set of features available for a specific messaging use case (SMS or MMS). Features
     * can vary depending on the characteristics the phone number, as well as its current
     * product configuration.
     *
     * @param MessagingFeatureSet|MessagingFeatureSetShape|null $mms
     */
    public function withMms(MessagingFeatureSet|array|null $mms): self
    {
        $self = clone $this;
        $self['mms'] = $mms;

        return $self;
    }

    /**
     * The set of features available for a specific messaging use case (SMS or MMS). Features
     * can vary depending on the characteristics the phone number, as well as its current
     * product configuration.
     *
     * @param MessagingFeatureSet|MessagingFeatureSetShape|null $sms
     */
    public function withSMS(MessagingFeatureSet|array|null $sms): self
    {
        $self = clone $this;
        $self['sms'] = $sms;

        return $self;
    }
}
