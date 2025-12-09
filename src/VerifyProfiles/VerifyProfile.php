<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifyProfiles\VerifyProfile\Call;
use Telnyx\VerifyProfiles\VerifyProfile\Flashcall;
use Telnyx\VerifyProfiles\VerifyProfile\RecordType;
use Telnyx\VerifyProfiles\VerifyProfile\SMS;

/**
 * @phpstan-type VerifyProfileShape = array{
 *   id?: string|null,
 *   call?: Call|null,
 *   createdAt?: string|null,
 *   flashcall?: Flashcall|null,
 *   language?: string|null,
 *   name?: string|null,
 *   recordType?: value-of<RecordType>|null,
 *   sms?: SMS|null,
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
     * @param Call|array{
     *   appName?: string|null,
     *   codeLength?: int|null,
     *   defaultVerificationTimeoutSecs?: int|null,
     *   messagingTemplateID?: string|null,
     *   whitelistedDestinations?: list<string>|null,
     * } $call
     * @param Flashcall|array{defaultVerificationTimeoutSecs?: int|null} $flashcall
     * @param RecordType|value-of<RecordType> $recordType
     * @param SMS|array{
     *   alphaSender?: string|null,
     *   appName?: string|null,
     *   codeLength?: int|null,
     *   defaultVerificationTimeoutSecs?: int|null,
     *   messagingTemplateID?: string|null,
     *   whitelistedDestinations?: list<string>|null,
     * } $sms
     */
    public static function with(
        ?string $id = null,
        Call|array|null $call = null,
        ?string $createdAt = null,
        Flashcall|array|null $flashcall = null,
        ?string $language = null,
        ?string $name = null,
        RecordType|string|null $recordType = null,
        SMS|array|null $sms = null,
        ?string $updatedAt = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $call && $obj['call'] = $call;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $flashcall && $obj['flashcall'] = $flashcall;
        null !== $language && $obj['language'] = $language;
        null !== $name && $obj['name'] = $name;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $sms && $obj['sms'] = $sms;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $webhookFailoverURL && $obj['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $obj['webhookURL'] = $webhookURL;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param Call|array{
     *   appName?: string|null,
     *   codeLength?: int|null,
     *   defaultVerificationTimeoutSecs?: int|null,
     *   messagingTemplateID?: string|null,
     *   whitelistedDestinations?: list<string>|null,
     * } $call
     */
    public function withCall(Call|array $call): self
    {
        $obj = clone $this;
        $obj['call'] = $call;

        return $obj;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * @param Flashcall|array{defaultVerificationTimeoutSecs?: int|null} $flashcall
     */
    public function withFlashcall(Flashcall|array $flashcall): self
    {
        $obj = clone $this;
        $obj['flashcall'] = $flashcall;

        return $obj;
    }

    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The possible verification profile record types.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * @param SMS|array{
     *   alphaSender?: string|null,
     *   appName?: string|null,
     *   codeLength?: int|null,
     *   defaultVerificationTimeoutSecs?: int|null,
     *   messagingTemplateID?: string|null,
     *   whitelistedDestinations?: list<string>|null,
     * } $sms
     */
    public function withSMS(SMS|array $sms): self
    {
        $obj = clone $this;
        $obj['sms'] = $sms;

        return $obj;
    }

    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj['webhookFailoverURL'] = $webhookFailoverURL;

        return $obj;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhookURL'] = $webhookURL;

        return $obj;
    }
}
