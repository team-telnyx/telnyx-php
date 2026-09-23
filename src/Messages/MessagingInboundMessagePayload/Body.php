<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessagingInboundMessagePayload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessagingInboundMessagePayload\Body\Edit;
use Telnyx\Messages\MessagingInboundMessagePayload\Body\Location;
use Telnyx\Messages\MessagingInboundMessagePayload\Body\Revoke;
use Telnyx\Messages\MessagingInboundMessagePayload\Body\SuggestionResponse;
use Telnyx\Messages\MessagingInboundMessagePayload\Body\UserFile;

/**
 * Message body for RCS and WhatsApp. RCS messages contain text, user_file, location, or suggestion_response. For WhatsApp edits and revocations, inspect type and the corresponding edit or revoke object.
 *
 * @phpstan-import-type TextVariants from \Telnyx\Messages\MessagingInboundMessagePayload\Body\Text
 * @phpstan-import-type EditShape from \Telnyx\Messages\MessagingInboundMessagePayload\Body\Edit
 * @phpstan-import-type LocationShape from \Telnyx\Messages\MessagingInboundMessagePayload\Body\Location
 * @phpstan-import-type RevokeShape from \Telnyx\Messages\MessagingInboundMessagePayload\Body\Revoke
 * @phpstan-import-type SuggestionResponseShape from \Telnyx\Messages\MessagingInboundMessagePayload\Body\SuggestionResponse
 * @phpstan-import-type TextShape from \Telnyx\Messages\MessagingInboundMessagePayload\Body\Text
 * @phpstan-import-type UserFileShape from \Telnyx\Messages\MessagingInboundMessagePayload\Body\UserFile
 *
 * @phpstan-type BodyShape = array{
 *   id?: string|null,
 *   edit?: null|Edit|EditShape,
 *   foreignID?: string|null,
 *   from?: string|null,
 *   location?: null|Location|LocationShape,
 *   revoke?: null|Revoke|RevokeShape,
 *   suggestionResponse?: null|SuggestionResponse|SuggestionResponseShape,
 *   text?: TextShape|null,
 *   timestamp?: string|null,
 *   type?: string|null,
 *   userFile?: null|UserFile|UserFileShape,
 * }
 */
final class Body implements BaseModel
{
    /** @use SdkModel<BodyShape> */
    use SdkModel;

    /**
     * Telnyx identifier for this webhook message.
     */
    #[Optional]
    public ?string $id;

    /**
     * Details for an edited WhatsApp message.
     */
    #[Optional]
    public ?Edit $edit;

    /**
     * Meta WhatsApp message identifier for this webhook event.
     */
    #[Optional('foreign_id')]
    public ?string $foreignID;

    /**
     * WhatsApp sender in E.164 format.
     */
    #[Optional]
    public ?string $from;

    /**
     * Location shared in an RCS message.
     */
    #[Optional]
    public ?Location $location;

    /**
     * Details for a revoked WhatsApp message.
     */
    #[Optional]
    public ?Revoke $revoke;

    /**
     * Selected RCS suggestion.
     */
    #[Optional('suggestion_response')]
    public ?SuggestionResponse $suggestionResponse;

    /**
     * RCS text string or WhatsApp text object.
     *
     * @var TextVariants|null $text
     */
    #[Optional]
    public string|Body\Text\Body|null $text;

    /**
     * Unix timestamp supplied by Meta.
     */
    #[Optional]
    public ?string $timestamp;

    /**
     * WhatsApp message body type. Edit and revoke events use `edit` and `revoke`, respectively.
     */
    #[Optional]
    public ?string $type;

    /**
     * RCS file attachment and optional thumbnail.
     */
    #[Optional('user_file')]
    public ?UserFile $userFile;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Edit|EditShape|null $edit
     * @param Location|LocationShape|null $location
     * @param Revoke|RevokeShape|null $revoke
     * @param SuggestionResponse|SuggestionResponseShape|null $suggestionResponse
     * @param TextShape|null $text
     * @param UserFile|UserFileShape|null $userFile
     */
    public static function with(
        ?string $id = null,
        Edit|array|null $edit = null,
        ?string $foreignID = null,
        ?string $from = null,
        Location|array|null $location = null,
        Revoke|array|null $revoke = null,
        SuggestionResponse|array|null $suggestionResponse = null,
        string|Body\Text\Body|array|null $text = null,
        ?string $timestamp = null,
        ?string $type = null,
        UserFile|array|null $userFile = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $edit && $self['edit'] = $edit;
        null !== $foreignID && $self['foreignID'] = $foreignID;
        null !== $from && $self['from'] = $from;
        null !== $location && $self['location'] = $location;
        null !== $revoke && $self['revoke'] = $revoke;
        null !== $suggestionResponse && $self['suggestionResponse'] = $suggestionResponse;
        null !== $text && $self['text'] = $text;
        null !== $timestamp && $self['timestamp'] = $timestamp;
        null !== $type && $self['type'] = $type;
        null !== $userFile && $self['userFile'] = $userFile;

        return $self;
    }

    /**
     * Telnyx identifier for this webhook message.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Details for an edited WhatsApp message.
     *
     * @param Edit|EditShape $edit
     */
    public function withEdit(Edit|array $edit): self
    {
        $self = clone $this;
        $self['edit'] = $edit;

        return $self;
    }

    /**
     * Meta WhatsApp message identifier for this webhook event.
     */
    public function withForeignID(string $foreignID): self
    {
        $self = clone $this;
        $self['foreignID'] = $foreignID;

        return $self;
    }

    /**
     * WhatsApp sender in E.164 format.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Location shared in an RCS message.
     *
     * @param Location|LocationShape $location
     */
    public function withLocation(Location|array $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    /**
     * Details for a revoked WhatsApp message.
     *
     * @param Revoke|RevokeShape $revoke
     */
    public function withRevoke(Revoke|array $revoke): self
    {
        $self = clone $this;
        $self['revoke'] = $revoke;

        return $self;
    }

    /**
     * Selected RCS suggestion.
     *
     * @param SuggestionResponse|SuggestionResponseShape $suggestionResponse
     */
    public function withSuggestionResponse(
        SuggestionResponse|array $suggestionResponse
    ): self {
        $self = clone $this;
        $self['suggestionResponse'] = $suggestionResponse;

        return $self;
    }

    /**
     * RCS text string or WhatsApp text object.
     *
     * @param TextShape $text
     */
    public function withText(
        string|Body\Text\Body|array $text,
    ): self {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * Unix timestamp supplied by Meta.
     */
    public function withTimestamp(string $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * WhatsApp message body type. Edit and revoke events use `edit` and `revoke`, respectively.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * RCS file attachment and optional thumbnail.
     *
     * @param UserFile|UserFileShape $userFile
     */
    public function withUserFile(UserFile|array $userFile): self
    {
        $self = clone $this;
        $self['userFile'] = $userFile;

        return $self;
    }
}
