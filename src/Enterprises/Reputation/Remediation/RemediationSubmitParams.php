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
 * @see Telnyx\Services\Enterprises\Reputation\RemediationService::submit()
 *
 * @phpstan-type RemediationSubmitParamsShape = array{
 *   callPurpose: string,
 *   phoneNumbers: list<string>,
 *   contactEmail?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class RemediationSubmitParams implements BaseModel
{
    /** @use SdkModel<RemediationSubmitParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * How the numbers are used (free text).
     */
    #[Required('call_purpose')]
    public string $callPurpose;

    /**
     * Phone numbers in E.164 format. Each must belong to this enterprise. Maximum 2,000 per request.
     *
     * @var list<string> $phoneNumbers
     */
    #[Required('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * Optional contact email for this remediation request.
     */
    #[Optional('contact_email')]
    public ?string $contactEmail;

    /**
     * Optional https:// URL for status notifications.
     */
    #[Optional('webhook_url')]
    public ?string $webhookURL;

    /**
     * `new RemediationSubmitParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RemediationSubmitParams::with(callPurpose: ..., phoneNumbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RemediationSubmitParams)->withCallPurpose(...)->withPhoneNumbers(...)
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
        array $phoneNumbers,
        ?string $contactEmail = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        $self['callPurpose'] = $callPurpose;
        $self['phoneNumbers'] = $phoneNumbers;

        null !== $contactEmail && $self['contactEmail'] = $contactEmail;
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
     * Optional contact email for this remediation request.
     */
    public function withContactEmail(string $contactEmail): self
    {
        $self = clone $this;
        $self['contactEmail'] = $contactEmail;

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
