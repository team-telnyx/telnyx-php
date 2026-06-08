<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Remediation;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Submit a batch of phone numbers belonging to this enterprise for reputation remediation. The request is accepted asynchronously: this endpoint returns `202` with the persisted request id, then the request transitions through processing states until completion. Use the GET endpoints to poll status and per-number results.
 *
 * Each phone number must be in E.164 format and belong to this enterprise. A number that already has an in-flight remediation request is rejected.
 *
 * @see Telnyx\Services\Enterprises\Reputation\RemediationService::create()
 *
 * @phpstan-type RemediationCreateParamsShape = array{
 *   callPurpose: string,
 *   contactEmail: string,
 *   phoneNumbers: list<string>,
 *   webhookURL?: string|null,
 * }
 */
final class RemediationCreateParams implements BaseModel
{
    /** @use SdkModel<RemediationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * How the numbers are used (free text).
     */
    #[Required('call_purpose')]
    public string $callPurpose;

    /**
     * Contact email for tracking this request.
     */
    #[Required('contact_email')]
    public string $contactEmail;

    /**
     * Phone numbers in E.164 format. Each must belong to this enterprise. Maximum 2,000 per request.
     *
     * @var list<string> $phoneNumbers
     */
    #[Required('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * Optional https:// URL for status notifications.
     */
    #[Optional('webhook_url')]
    public ?string $webhookURL;

    /**
     * `new RemediationCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RemediationCreateParams::with(
     *   callPurpose: ..., contactEmail: ..., phoneNumbers: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RemediationCreateParams)
     *   ->withCallPurpose(...)
     *   ->withContactEmail(...)
     *   ->withPhoneNumbers(...)
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
     * @param list<string> $phoneNumbers
     */
    public static function with(
        string $callPurpose,
        string $contactEmail,
        array $phoneNumbers,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        $self['callPurpose'] = $callPurpose;
        $self['contactEmail'] = $contactEmail;
        $self['phoneNumbers'] = $phoneNumbers;

        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * How the numbers are used (free text).
     */
    public function withCallPurpose(string $callPurpose): self
    {
        $self = clone $this;
        $self['callPurpose'] = $callPurpose;

        return $self;
    }

    /**
     * Contact email for tracking this request.
     */
    public function withContactEmail(string $contactEmail): self
    {
        $self = clone $this;
        $self['contactEmail'] = $contactEmail;

        return $self;
    }

    /**
     * Phone numbers in E.164 format. Each must belong to this enterprise. Maximum 2,000 per request.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * Optional https:// URL for status notifications.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
