<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\Messaging\MobilePhoneNumberWithMessagingSettings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\MessagingFeatureSet;

/**
 * @phpstan-import-type MessagingFeatureSetShape from \Telnyx\MessagingFeatureSet
 *
 * @phpstan-type FeaturesShape = array{
 *   sms?: null|MessagingFeatureSet|MessagingFeatureSetShape
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
     * @param Omitted|MessagingFeatureSet|MessagingFeatureSetShape|null $sms
     */
    public static function with(
        Omitted|MessagingFeatureSet|array|null $sms = Omitted::VALUE
    ): self {
        $self = new self;

        Omitted::VALUE !== $sms && $self['sms'] = $sms;

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
