<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Dir;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\Document;

/**
 * Create a new DIR under the given enterprise. The DIR starts in `draft` status; it must be submitted (`POST .../submit`) and approved by Telnyx before any phone number can be attached.
 *
 * **Field rules**
 * - `display_name`: 1–35 characters, no emoji or whitespace-only strings; this is the name shown to recipients.
 * - `call_reasons`: 1–10 strings, each ≤64 characters; describe why your business calls customers (e.g. 'Appointment reminders', 'Billing inquiries'). Validate the wording against `POST /call_reasons/validate`.
 * - `logo_url`: HTTPS URL (max 128 chars) to a 256×256 BMP (max 1 MB). The image is downloaded and hashed at submission time.
 * - `documents`: up to 20 entries; each `document_id` must be obtained by uploading the file via the Telnyx Documents API first. Within one DIR a `document_id` may only appear once.
 * - `certify_brand_is_accurate`, `certify_no_shaft_content`, `certify_ip_ownership` MUST all be `true`.
 *
 * **Failure modes**
 * - `422` - validation error; `errors[].source.pointer` names the offending field.
 * - `403` - Branded Calling not activated on this enterprise (see `POST /enterprises/{id}/branded_calling`).
 * - `404` - enterprise does not exist or does not belong to your account.
 *
 * @see Telnyx\Services\Enterprises\DirService::create()
 *
 * @phpstan-import-type DocumentShape from \Telnyx\Dir\Document
 *
 * @phpstan-type DirCreateParamsShape = array{
 *   authorizerEmail: string,
 *   authorizerName: string,
 *   callReasons: list<string>,
 *   certifyBrandIsAccurate: bool,
 *   certifyIPOwnership: bool,
 *   certifyNoShaftContent: bool,
 *   displayName: string,
 *   documents?: list<Document|DocumentShape>|null,
 *   logoURL?: string|null,
 *   reselling?: bool|null,
 * }
 */
final class DirCreateParams implements BaseModel
{
    /** @use SdkModel<DirCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Contact email of the authorizer. Telnyx may send verification or infringement-notice email here; use a monitored mailbox.
     */
    #[Required('authorizer_email')]
    public string $authorizerEmail;

    /**
     * Name of the person at your enterprise who is authorizing this DIR registration. Must be a real individual (used for audit and trademark-claim contests).
     */
    #[Required('authorizer_name')]
    public string $authorizerName;

    /**
     * 1–10 reasons your business calls customers. Validate phrasing against `POST /call_reasons/validate`.
     *
     * @var list<string> $callReasons
     */
    #[Required('call_reasons', list: 'string')]
    public array $callReasons;

    /**
     * Must be `true`.
     */
    #[Required('certify_brand_is_accurate')]
    public bool $certifyBrandIsAccurate;

    /**
     * Must be `true`. Confirms ownership of any logos/trademarks shown.
     */
    #[Required('certify_ip_ownership')]
    public bool $certifyIPOwnership;

    /**
     * Must be `true`. Confirms this DIR is not used for SHAFT content (Sex, Hate, Alcohol, Firearms, Tobacco) where prohibited.
     */
    #[Required('certify_no_shaft_content')]
    public bool $certifyNoShaftContent;

    /**
     * Name shown to call recipients. No emoji; not whitespace-only.
     */
    #[Required('display_name')]
    public string $displayName;

    /**
     * Supporting documents. Each `document_id` may appear at most once on a DIR.
     *
     * @var list<Document>|null $documents
     */
    #[Optional(list: Document::class)]
    public ?array $documents;

    /**
     * Publicly accessible HTTPS URL (max 128 chars) to a 256x256 BMP logo (max 1 MB).
     */
    #[Optional('logo_url')]
    public ?string $logoURL;

    /**
     * Set to true if your organization places calls on behalf of other enterprises (BPO/reseller).
     */
    #[Optional]
    public ?bool $reselling;

    /**
     * `new DirCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DirCreateParams::with(
     *   authorizerEmail: ...,
     *   authorizerName: ...,
     *   callReasons: ...,
     *   certifyBrandIsAccurate: ...,
     *   certifyIPOwnership: ...,
     *   certifyNoShaftContent: ...,
     *   displayName: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DirCreateParams)
     *   ->withAuthorizerEmail(...)
     *   ->withAuthorizerName(...)
     *   ->withCallReasons(...)
     *   ->withCertifyBrandIsAccurate(...)
     *   ->withCertifyIPOwnership(...)
     *   ->withCertifyNoShaftContent(...)
     *   ->withDisplayName(...)
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
     * @param list<string> $callReasons
     * @param list<Document|DocumentShape>|null $documents
     */
    public static function with(
        string $authorizerEmail,
        string $authorizerName,
        array $callReasons,
        bool $certifyBrandIsAccurate,
        bool $certifyIPOwnership,
        bool $certifyNoShaftContent,
        string $displayName,
        ?array $documents = null,
        ?string $logoURL = null,
        ?bool $reselling = null,
    ): self {
        $self = new self;

        $self['authorizerEmail'] = $authorizerEmail;
        $self['authorizerName'] = $authorizerName;
        $self['callReasons'] = $callReasons;
        $self['certifyBrandIsAccurate'] = $certifyBrandIsAccurate;
        $self['certifyIPOwnership'] = $certifyIPOwnership;
        $self['certifyNoShaftContent'] = $certifyNoShaftContent;
        $self['displayName'] = $displayName;

        null !== $documents && $self['documents'] = $documents;
        null !== $logoURL && $self['logoURL'] = $logoURL;
        null !== $reselling && $self['reselling'] = $reselling;

        return $self;
    }

    /**
     * Contact email of the authorizer. Telnyx may send verification or infringement-notice email here; use a monitored mailbox.
     */
    public function withAuthorizerEmail(string $authorizerEmail): self
    {
        $self = clone $this;
        $self['authorizerEmail'] = $authorizerEmail;

        return $self;
    }

    /**
     * Name of the person at your enterprise who is authorizing this DIR registration. Must be a real individual (used for audit and trademark-claim contests).
     */
    public function withAuthorizerName(string $authorizerName): self
    {
        $self = clone $this;
        $self['authorizerName'] = $authorizerName;

        return $self;
    }

    /**
     * 1–10 reasons your business calls customers. Validate phrasing against `POST /call_reasons/validate`.
     *
     * @param list<string> $callReasons
     */
    public function withCallReasons(array $callReasons): self
    {
        $self = clone $this;
        $self['callReasons'] = $callReasons;

        return $self;
    }

    /**
     * Must be `true`.
     */
    public function withCertifyBrandIsAccurate(
        bool $certifyBrandIsAccurate
    ): self {
        $self = clone $this;
        $self['certifyBrandIsAccurate'] = $certifyBrandIsAccurate;

        return $self;
    }

    /**
     * Must be `true`. Confirms ownership of any logos/trademarks shown.
     */
    public function withCertifyIPOwnership(bool $certifyIPOwnership): self
    {
        $self = clone $this;
        $self['certifyIPOwnership'] = $certifyIPOwnership;

        return $self;
    }

    /**
     * Must be `true`. Confirms this DIR is not used for SHAFT content (Sex, Hate, Alcohol, Firearms, Tobacco) where prohibited.
     */
    public function withCertifyNoShaftContent(bool $certifyNoShaftContent): self
    {
        $self = clone $this;
        $self['certifyNoShaftContent'] = $certifyNoShaftContent;

        return $self;
    }

    /**
     * Name shown to call recipients. No emoji; not whitespace-only.
     */
    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * Supporting documents. Each `document_id` may appear at most once on a DIR.
     *
     * @param list<Document|DocumentShape> $documents
     */
    public function withDocuments(array $documents): self
    {
        $self = clone $this;
        $self['documents'] = $documents;

        return $self;
    }

    /**
     * Publicly accessible HTTPS URL (max 128 chars) to a 256x256 BMP logo (max 1 MB).
     */
    public function withLogoURL(string $logoURL): self
    {
        $self = clone $this;
        $self['logoURL'] = $logoURL;

        return $self;
    }

    /**
     * Set to true if your organization places calls on behalf of other enterprises (BPO/reseller).
     */
    public function withReselling(bool $reselling): self
    {
        $self = clone $this;
        $self['reselling'] = $reselling;

        return $self;
    }
}
