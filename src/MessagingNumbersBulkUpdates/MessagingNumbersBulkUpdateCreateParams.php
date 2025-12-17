<?php

declare(strict_types=1);

namespace Telnyx\MessagingNumbersBulkUpdates;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Bulk update phone number profiles.
 *
 * @see Telnyx\Services\MessagingNumbersBulkUpdatesService::create()
 *
 * @phpstan-type MessagingNumbersBulkUpdateCreateParamsShape = array{
 *   messagingProfileID: string, numbers: list<string>
 * }
 */
final class MessagingNumbersBulkUpdateCreateParams implements BaseModel
{
    /** @use SdkModel<MessagingNumbersBulkUpdateCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Configure the messaging profile these phone numbers are assigned to:
     *
     * * Set this field to `""` to unassign each number from their respective messaging profile
     * * Set this field to a quoted UUID of a messaging profile to assign these numbers to that messaging profile
     */
    #[Required('messaging_profile_id')]
    public string $messagingProfileID;

    /**
     * The list of phone numbers to update.
     *
     * @var list<string> $numbers
     */
    #[Required(list: 'string')]
    public array $numbers;

    /**
     * `new MessagingNumbersBulkUpdateCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessagingNumbersBulkUpdateCreateParams::with(
     *   messagingProfileID: ..., numbers: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessagingNumbersBulkUpdateCreateParams)
     *   ->withMessagingProfileID(...)
     *   ->withNumbers(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $numbers
     */
    public static function with(
        string $messagingProfileID,
        array $numbers
    ): self {
        $self = new self;

        $self['messagingProfileID'] = $messagingProfileID;
        $self['numbers'] = $numbers;

        return $self;
    }

    /**
     * Configure the messaging profile these phone numbers are assigned to:
     *
     * * Set this field to `""` to unassign each number from their respective messaging profile
     * * Set this field to a quoted UUID of a messaging profile to assign these numbers to that messaging profile
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * The list of phone numbers to update.
     *
     * @param list<string> $numbers
     */
    public function withNumbers(array $numbers): self
    {
        $self = clone $this;
        $self['numbers'] = $numbers;

        return $self;
    }
}
