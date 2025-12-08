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
 *   created_at?: string|null,
 *   flashcall?: Flashcall|null,
 *   language?: string|null,
 *   name?: string|null,
 *   record_type?: value-of<RecordType>|null,
 *   sms?: SMS|null,
 *   updated_at?: string|null,
 *   webhook_failover_url?: string|null,
 *   webhook_url?: string|null,
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

    #[Optional]
    public ?string $created_at;

    #[Optional]
    public ?Flashcall $flashcall;

    #[Optional]
    public ?string $language;

    #[Optional]
    public ?string $name;

    /**
     * The possible verification profile record types.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Optional(enum: RecordType::class)]
    public ?string $record_type;

    #[Optional]
    public ?SMS $sms;

    #[Optional]
    public ?string $updated_at;

    #[Optional]
    public ?string $webhook_failover_url;

    #[Optional]
    public ?string $webhook_url;

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
     *   app_name?: string|null,
     *   code_length?: int|null,
     *   default_verification_timeout_secs?: int|null,
     *   messaging_template_id?: string|null,
     *   whitelisted_destinations?: list<string>|null,
     * } $call
     * @param Flashcall|array{default_verification_timeout_secs?: int|null} $flashcall
     * @param RecordType|value-of<RecordType> $record_type
     * @param SMS|array{
     *   alpha_sender?: string|null,
     *   app_name?: string|null,
     *   code_length?: int|null,
     *   default_verification_timeout_secs?: int|null,
     *   messaging_template_id?: string|null,
     *   whitelisted_destinations?: list<string>|null,
     * } $sms
     */
    public static function with(
        ?string $id = null,
        Call|array|null $call = null,
        ?string $created_at = null,
        Flashcall|array|null $flashcall = null,
        ?string $language = null,
        ?string $name = null,
        RecordType|string|null $record_type = null,
        SMS|array|null $sms = null,
        ?string $updated_at = null,
        ?string $webhook_failover_url = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $call && $obj['call'] = $call;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $flashcall && $obj['flashcall'] = $flashcall;
        null !== $language && $obj['language'] = $language;
        null !== $name && $obj['name'] = $name;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $sms && $obj['sms'] = $sms;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $webhook_failover_url && $obj['webhook_failover_url'] = $webhook_failover_url;
        null !== $webhook_url && $obj['webhook_url'] = $webhook_url;

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
     *   app_name?: string|null,
     *   code_length?: int|null,
     *   default_verification_timeout_secs?: int|null,
     *   messaging_template_id?: string|null,
     *   whitelisted_destinations?: list<string>|null,
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
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * @param Flashcall|array{default_verification_timeout_secs?: int|null} $flashcall
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
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * @param SMS|array{
     *   alpha_sender?: string|null,
     *   app_name?: string|null,
     *   code_length?: int|null,
     *   default_verification_timeout_secs?: int|null,
     *   messaging_template_id?: string|null,
     *   whitelisted_destinations?: list<string>|null,
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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj['webhook_failover_url'] = $webhookFailoverURL;

        return $obj;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhook_url'] = $webhookURL;

        return $obj;
    }
}
