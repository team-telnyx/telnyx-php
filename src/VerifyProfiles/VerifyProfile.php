<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifyProfiles\VerifyProfile\Call;
use Telnyx\VerifyProfiles\VerifyProfile\Flashcall;
use Telnyx\VerifyProfiles\VerifyProfile\Rcs;
use Telnyx\VerifyProfiles\VerifyProfile\RecordType;
use Telnyx\VerifyProfiles\VerifyProfile\SMS;

/**
 * @phpstan-import-type CallShape from \Telnyx\VerifyProfiles\VerifyProfile\Call
 * @phpstan-import-type FlashcallShape from \Telnyx\VerifyProfiles\VerifyProfile\Flashcall
 * @phpstan-import-type RcsShape from \Telnyx\VerifyProfiles\VerifyProfile\Rcs
 * @phpstan-import-type SMSShape from \Telnyx\VerifyProfiles\VerifyProfile\SMS
 *
 * @phpstan-type VerifyProfileShape = array{
 *   id?: string|null,
 *   call?: null|Call|CallShape,
 *   createdAt?: string|null,
 *   flashcall?: null|Flashcall|FlashcallShape,
 *   language?: string|null,
 *   name?: string|null,
 *   rcs?: null|Rcs|RcsShape,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   sms?: null|SMS|SMSShape,
 *   updatedAt?: string|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class VerifyProfile implements BaseModel
{
    /** @use SdkModel<VerifyProfileShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?Call $call;

    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional]
    public ?Flashcall $flashcall;

    #[Optional]
    public ?string $language;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?Rcs $rcs;

    /**
     * The possible verification profile record types.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    #[Optional]
    public ?SMS $sms;

    #[Optional('updated_at')]
    public ?string $updatedAt;

    #[Optional('webhook_failover_url')]
    public ?string $webhookFailoverURL;

    #[Optional('webhook_url')]
    public ?string $webhookURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Call|CallShape|null $call
     * @param Flashcall|FlashcallShape|null $flashcall
     * @param Rcs|RcsShape|null $rcs
     * @param RecordType|value-of<RecordType>|null $recordType
     * @param SMS|SMSShape|null $sms
     */
    public static function with(
        ?string $id = null,
        Call|array|null $call = null,
        ?string $createdAt = null,
        Flashcall|array|null $flashcall = null,
        ?string $language = null,
        ?string $name = null,
        Rcs|array|null $rcs = null,
        RecordType|string|null $recordType = null,
        SMS|array|null $sms = null,
        ?string $updatedAt = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $call && $self['call'] = $call;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $flashcall && $self['flashcall'] = $flashcall;
        null !== $language && $self['language'] = $language;
        null !== $name && $self['name'] = $name;
        null !== $rcs && $self['rcs'] = $rcs;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $sms && $self['sms'] = $sms;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param Call|CallShape $call
     */
    public function withCall(Call|array $call): self
    {
        $self = clone $this;
        $self['call'] = $call;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param Flashcall|FlashcallShape $flashcall
     */
    public function withFlashcall(Flashcall|array $flashcall): self
    {
        $self = clone $this;
        $self['flashcall'] = $flashcall;

        return $self;
    }

    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param Rcs|RcsShape $rcs
     */
    public function withRcs(Rcs|array $rcs): self
    {
        $self = clone $this;
        $self['rcs'] = $rcs;

        return $self;
    }

    /**
     * The possible verification profile record types.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param SMS|SMSShape $sms
     */
    public function withSMS(SMS|array $sms): self
    {
        $self = clone $this;
        $self['sms'] = $sms;

        return $self;
    }

    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $self = clone $this;
        $self['webhookFailoverURL'] = $webhookFailoverURL;

        return $self;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
