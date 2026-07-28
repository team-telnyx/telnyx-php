<?php

declare(strict_types=1);

namespace Telnyx\EmailValidations\Batch;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates an asynchronous batch validation job for up to 1,000 email addresses.
 *
 * @see Telnyx\Services\EmailValidations\BatchService::create()
 *
 * @phpstan-type BatchCreateParamsShape = array{
 *   emails: list<string>, webhookURL?: string|null, idempotencyKey?: string|null
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $emails */
    #[Required(list: 'string')]
    public array $emails;

    /**
     * URL for batch completion webhook. Empty string is treated as omitted. SSRF-protected; private/reserved IPs and internal hostnames are rejected.
     */
    #[Optional('webhook_url')]
    public ?string $webhookURL;

    #[Optional]
    public ?string $idempotencyKey;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(emails: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withEmails(...)
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
     * @param list<string> $emails
     */
    public static function with(
        array $emails,
        ?string $webhookURL = null,
        ?string $idempotencyKey = null
    ): self {
        $self = new self;

        $self['emails'] = $emails;

        null !== $webhookURL && $self['webhookURL'] = $webhookURL;
        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    /**
     * @param list<string> $emails
     */
    public function withEmails(array $emails): self
    {
        $self = clone $this;
        $self['emails'] = $emails;

        return $self;
    }

    /**
     * URL for batch completion webhook. Empty string is treated as omitted. SSRF-protected; private/reserved IPs and internal hostnames are rejected.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }
}
