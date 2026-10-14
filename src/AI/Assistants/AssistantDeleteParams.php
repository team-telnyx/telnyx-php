<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Delete an AI Assistant by `assistant_id`.
 *
 * By default this performs a soft delete: the assistant moves to the Recently Deleted list and stays restorable for 30 days, after which it is permanently deleted automatically. The assistant's versions and TeXML application are preserved during the retention window.
 *
 * Pass `hard_delete=true` to skip the retention window and permanently delete the assistant immediately. A hard delete erases the assistant and all of its versions, and deletes its TeXML application unless phone numbers are still assigned to it. It does not delete conversations, recordings, shared tools the assistant referenced, or knowledge-base embeddings.
 *
 * Deletion fails with `400` if other assistants reference this one through a handoff tool or a conversation-flow edge — remove those references first.
 *
 * @see Telnyx\Services\AI\AssistantsService::delete()
 *
 * @phpstan-type AssistantDeleteParamsShape = array{hardDelete?: bool|null}
 */
final class AssistantDeleteParams implements BaseModel
{
    /** @use SdkModel<AssistantDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Permanently delete the assistant immediately instead of soft-deleting it to the Recently Deleted list, where it stays restorable for 30 days.
     */
    #[Optional]
    public ?bool $hardDelete;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $hardDelete = null): self
    {
        $self = new self;

        null !== $hardDelete && $self['hardDelete'] = $hardDelete;

        return $self;
    }

    /**
     * Permanently delete the assistant immediately instead of soft-deleting it to the Recently Deleted list, where it stays restorable for 30 days.
     */
    public function withHardDelete(bool $hardDelete): self
    {
        $self = clone $this;
        $self['hardDelete'] = $hardDelete;

        return $self;
    }
}
