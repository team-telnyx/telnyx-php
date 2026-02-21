<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the messaging settings for a hosted number.
 *
 * @see Telnyx\Services\MessagingHostedNumbersService::update()
 *
 * @phpstan-type MessagingHostedNumberUpdateParamsShape = array{
 *   messagingProduct?: string|null,
 *   messagingProfileID?: string|null,
 *   tags?: list<string>|null,
 * }
 */
final class MessagingHostedNumberUpdateParams implements BaseModel
{
    /** @use SdkModel<MessagingHostedNumberUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Configure the messaging product for this number:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to a quoted product ID to set this phone number to that product
     */
    #[Optional('messaging_product')]
    public ?string $messagingProduct;

    /**
     * Configure the messaging profile this phone number is assigned to:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to `""` to unassign the number from its messaging profile
     * * Set this field to a quoted UUID of a messaging profile to assign this number to that messaging profile
     */
    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

    /**
     * Tags to set on this phone number.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $tags
     */
    public static function with(
        ?string $messagingProduct = null,
        ?string $messagingProfileID = null,
        ?array $tags = null,
    ): self {
        $self = new self;

        null !== $messagingProduct && $self['messagingProduct'] = $messagingProduct;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    /**
     * Configure the messaging product for this number:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to a quoted product ID to set this phone number to that product
     */
    public function withMessagingProduct(string $messagingProduct): self
    {
        $self = clone $this;
        $self['messagingProduct'] = $messagingProduct;

        return $self;
    }

    /**
     * Configure the messaging profile this phone number is assigned to:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to `""` to unassign the number from its messaging profile
     * * Set this field to a quoted UUID of a messaging profile to assign this number to that messaging profile
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * Tags to set on this phone number.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
