<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Edit a DIR. DIRs in `draft`, `rejected`, `unsuccessful`, or `suspended` can be edited freely: PATCH is a pure edit, `status` is never changed, and you re-vet by calling `POST /v2/dir/{dir_id}/submit` explicitly. A `verified` DIR can also be edited in place: a PATCH that changes any value returns the DIR to `draft`; the currently approved identity keeps displaying, and the edited content goes live only after you re-submit and the DIR is approved again. A PATCH that changes nothing (an empty body or values identical to the current ones) leaves the DIR `verified`, so idempotent retries are safe. Changing only `bpo_authorizations` or `webhook_url` is the exception: the DIR stays `verified`. Each BPO authorization is reviewed on its own instead. DIRs in any other status (`submitted`, `in_review`, `expired`, `infringement_claimed`, `permanently_rejected`) cannot be edited.
 *
 * @see Telnyx\Services\DirService::update()
 *
 * @phpstan-import-type BpoAuthorizationInputShape from \Telnyx\Dir\BpoAuthorizationInput
 * @phpstan-import-type DocumentShape from \Telnyx\Dir\Document
 *
 * @phpstan-type DirUpdateParamsShape = array{
 *   authorizerEmail?: string|null,
 *   authorizerName?: string|null,
 *   bpoAuthorizations?: list<BpoAuthorizationInput|BpoAuthorizationInputShape>|null,
 *   callReasons?: list<string>|null,
 *   certifyBrandIsAccurate?: bool|null,
 *   certifyIPOwnership?: bool|null,
 *   certifyNoShaftContent?: bool|null,
 *   displayName?: string|null,
 *   documents?: list<Document|DocumentShape>|null,
 *   logoURL?: string|null,
 *   reselling?: bool|null,
 *   webhookURL?: string|null,
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
     * Optional. Replace this DIR's authorized BPO (Business Process Outsourcer) accounts with these, each with its signed Letter of Authorization. The supplied list replaces the current one: a BPO left out has its authorization removed, and a new BPO (or a changed Letter of Authorization) is created `pending` admin review. Send an empty list to clear all authorizations; omit the field to leave them unchanged. Editing this list does not re-vet the DIR. Maximum 10.
     *
     * @var list<BpoAuthorizationInput>|null $bpoAuthorizations
     */
    #[Optional('bpo_authorizations', list: BpoAuthorizationInput::class)]
    public ?array $bpoAuthorizations;

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

    /**
     * Optional `https://` URL that receives webhook notifications when this DIR's compliance review completes. Send `null` to clear. Changing only this field on a `verified` DIR does not re-vet it. Maximum 2048 characters.
     */
    #[Optional('webhook_url', nullable: true)]
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
     * @param list<BpoAuthorizationInput|BpoAuthorizationInputShape>|null $bpoAuthorizations
     * @param list<string>|null $callReasons
     * @param list<Document|DocumentShape>|null $documents
     */
    public static function with(
        string|Omitted|null $webhookURL = Omitted::VALUE,
        ?string $authorizerEmail = null,
        ?string $authorizerName = null,
        ?array $bpoAuthorizations = null,
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
        null !== $bpoAuthorizations && $self['bpoAuthorizations'] = $bpoAuthorizations;
        null !== $callReasons && $self['callReasons'] = $callReasons;
        null !== $certifyBrandIsAccurate && $self['certifyBrandIsAccurate'] = $certifyBrandIsAccurate;
        null !== $certifyIPOwnership && $self['certifyIPOwnership'] = $certifyIPOwnership;
        null !== $certifyNoShaftContent && $self['certifyNoShaftContent'] = $certifyNoShaftContent;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $documents && $self['documents'] = $documents;
        null !== $logoURL && $self['logoURL'] = $logoURL;
        null !== $reselling && $self['reselling'] = $reselling;
        Omitted::VALUE !== $webhookURL && $self['webhookURL'] = $webhookURL;

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
     * Optional. Replace this DIR's authorized BPO (Business Process Outsourcer) accounts with these, each with its signed Letter of Authorization. The supplied list replaces the current one: a BPO left out has its authorization removed, and a new BPO (or a changed Letter of Authorization) is created `pending` admin review. Send an empty list to clear all authorizations; omit the field to leave them unchanged. Editing this list does not re-vet the DIR. Maximum 10.
     *
     * @param list<BpoAuthorizationInput|BpoAuthorizationInputShape> $bpoAuthorizations
     */
    public function withBpoAuthorizations(array $bpoAuthorizations): self
    {
        $self = clone $this;
        $self['bpoAuthorizations'] = $bpoAuthorizations;

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

    /**
     * Optional `https://` URL that receives webhook notifications when this DIR's compliance review completes. Send `null` to clear. Changing only this field on a `verified` DIR does not re-vet it. Maximum 2048 characters.
     */
    public function withWebhookURL(?string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
