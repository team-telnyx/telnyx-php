<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\DirUpdateParams\Document;

/**
 * Edit a DIR. DIRs in `draft`, `rejected`, `unsuccessful`, or `suspended` can be edited freely: PATCH is a pure edit, `status` is never changed, and you re-vet by calling `POST /v2/dir/{dir_id}/submit` explicitly. A `verified` DIR can also be edited in place: a PATCH that changes any value returns the DIR to `draft` and branded delivery stops until you re-submit and the DIR is approved again, while a PATCH that changes nothing (an empty body or values identical to the current ones) leaves the DIR `verified`, so idempotent retries are safe. DIRs in any other status (`submitted`, `in_review`, `expired`, `infringement_claimed`, `permanently_rejected`) cannot be edited.
 *
 * @see Telnyx\Services\DirService::update()
 *
 * @phpstan-import-type DocumentShape from \Telnyx\Dir\DirUpdateParams\Document
 *
 * @phpstan-type DirUpdateParamsShape = array{
 *   authorizerEmail?: string|null,
 *   authorizerName?: string|null,
 *   callReasons?: list<string>|null,
 *   certifyBrandIsAccurate?: bool|null,
 *   certifyIPOwnership?: bool|null,
 *   certifyNoShaftContent?: bool|null,
 *   displayName?: string|null,
 *   documents?: list<Document|DocumentShape>|null,
 *   logoURL?: string|null,
 *   reselling?: bool|null,
 * }
 */
final class DirUpdateParams implements BaseModel
{
    /** @use SdkModel<DirUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Contact email of the authorizer. Telnyx may send verification or infringement notices here.
     */
    #[Optional('authorizer_email')]
    public ?string $authorizerEmail;

    /**
     * Name of the person at your enterprise authorizing this DIR. Must be a real individual.
     */
    #[Optional('authorizer_name')]
    public ?string $authorizerName;

    /**
     * 1–10 reasons your business calls customers. Validate phrasing against `POST /call_reasons/validate`.
     *
     * @var list<string>|null $callReasons
     */
    #[Optional('call_reasons', list: 'string')]
    public ?array $callReasons;

    /**
     * Certification that the DIR information is accurate. Must be `true` for the DIR to be submitted for vetting.
     */
    #[Optional('certify_brand_is_accurate')]
    public ?bool $certifyBrandIsAccurate;

    /**
     * Certification of ownership of any logos/trademarks shown. Must be `true` for the DIR to be submitted for vetting.
     */
    #[Optional('certify_ip_ownership')]
    public ?bool $certifyIPOwnership;

    /**
     * Certification that this DIR is not used for SHAFT content (Sex, Hate, Alcohol, Firearms, Tobacco) where prohibited. Must be `true` for the DIR to be submitted for vetting.
     */
    #[Optional('certify_no_shaft_content')]
    public ?bool $certifyNoShaftContent;

    /**
     * Name shown to call recipients. 1–35 characters, no emoji, not whitespace-only.
     */
    #[Optional('display_name')]
    public ?string $displayName;

    /**
     * Additional supporting documents to attach. Append-only: existing documents are never removed or replaced, and an empty or omitted list is a no-op. Each `document_id` may appear at most once on a DIR.
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
     * Set to true if your organization places calls on behalf of other enterprises (BPO/reseller). Updating this triggers re-vetting on next submit.
     */
    #[Optional]
    public ?bool $reselling;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $callReasons
     * @param list<Document|DocumentShape>|null $documents
     */
    public static function with(
        ?string $authorizerEmail = null,
        ?string $authorizerName = null,
        ?array $callReasons = null,
        ?bool $certifyBrandIsAccurate = null,
        ?bool $certifyIPOwnership = null,
        ?bool $certifyNoShaftContent = null,
        ?string $displayName = null,
        ?array $documents = null,
        ?string $logoURL = null,
        ?bool $reselling = null,
    ): self {
        $self = new self;

        null !== $authorizerEmail && $self['authorizerEmail'] = $authorizerEmail;
        null !== $authorizerName && $self['authorizerName'] = $authorizerName;
        null !== $callReasons && $self['callReasons'] = $callReasons;
        null !== $certifyBrandIsAccurate && $self['certifyBrandIsAccurate'] = $certifyBrandIsAccurate;
        null !== $certifyIPOwnership && $self['certifyIPOwnership'] = $certifyIPOwnership;
        null !== $certifyNoShaftContent && $self['certifyNoShaftContent'] = $certifyNoShaftContent;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $documents && $self['documents'] = $documents;
        null !== $logoURL && $self['logoURL'] = $logoURL;
        null !== $reselling && $self['reselling'] = $reselling;

        return $self;
    }

    /**
     * Contact email of the authorizer. Telnyx may send verification or infringement notices here.
     */
    public function withAuthorizerEmail(string $authorizerEmail): self
    {
        $self = clone $this;
        $self['authorizerEmail'] = $authorizerEmail;

        return $self;
    }

    /**
     * Name of the person at your enterprise authorizing this DIR. Must be a real individual.
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
     * Certification that the DIR information is accurate. Must be `true` for the DIR to be submitted for vetting.
     */
    public function withCertifyBrandIsAccurate(
        bool $certifyBrandIsAccurate
    ): self {
        $self = clone $this;
        $self['certifyBrandIsAccurate'] = $certifyBrandIsAccurate;

        return $self;
    }

    /**
     * Certification of ownership of any logos/trademarks shown. Must be `true` for the DIR to be submitted for vetting.
     */
    public function withCertifyIPOwnership(bool $certifyIPOwnership): self
    {
        $self = clone $this;
        $self['certifyIPOwnership'] = $certifyIPOwnership;

        return $self;
    }

    /**
     * Certification that this DIR is not used for SHAFT content (Sex, Hate, Alcohol, Firearms, Tobacco) where prohibited. Must be `true` for the DIR to be submitted for vetting.
     */
    public function withCertifyNoShaftContent(bool $certifyNoShaftContent): self
    {
        $self = clone $this;
        $self['certifyNoShaftContent'] = $certifyNoShaftContent;

        return $self;
    }

    /**
     * Name shown to call recipients. 1–35 characters, no emoji, not whitespace-only.
     */
    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * Additional supporting documents to attach. Append-only: existing documents are never removed or replaced, and an empty or omitted list is a no-op. Each `document_id` may appear at most once on a DIR.
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
     * Set to true if your organization places calls on behalf of other enterprises (BPO/reseller). Updating this triggers re-vetting on next submit.
     */
    public function withReselling(bool $reselling): self
    {
        $self = clone $this;
        $self['reselling'] = $reselling;

        return $self;
    }
}
