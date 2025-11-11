<?php

declare(strict_types=1);

namespace Telnyx\MessagingNumbersBulkUpdates;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the messaging profile of multiple phone numbers.
 *
 * @see Telnyx\MessagingNumbersBulkUpdates->create
 *
 * @phpstan-type MessagingNumbersBulkUpdateCreateParamsShape = array{
 *   messaging_profile_id: string, numbers: list<string>
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
    #[Api]
    public string $messaging_profile_id;

    /**
     * The list of phone numbers to update.
     *
     * @var list<string> $numbers
     */
    #[Api(list: 'string')]
    public array $numbers;

    /**
     * `new MessagingNumbersBulkUpdateCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessagingNumbersBulkUpdateCreateParams::with(
     *   messaging_profile_id: ..., numbers: ...
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
        string $messaging_profile_id,
        array $numbers
    ): self {
        $obj = new self;

        $obj->messaging_profile_id = $messaging_profile_id;
        $obj->numbers = $numbers;

        return $obj;
    }

    /**
     * Configure the messaging profile these phone numbers are assigned to:
     *
     * * Set this field to `""` to unassign each number from their respective messaging profile
     * * Set this field to a quoted UUID of a messaging profile to assign these numbers to that messaging profile
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messaging_profile_id = $messagingProfileID;

        return $obj;
    }

    /**
     * The list of phone numbers to update.
     *
     * @param list<string> $numbers
     */
    public function withNumbers(array $numbers): self
    {
        $obj = clone $this;
        $obj->numbers = $numbers;

        return $obj;
    }
}
