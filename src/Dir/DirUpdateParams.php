<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Edit a DIR. Only DIRs in `draft`, `rejected`, `unsuccessful`, or `suspended` are editable. PATCH is a pure edit - `status` is never changed by this endpoint. To re-vet after editing, call `POST /v2/dir/{dir_id}/submit` explicitly.
 *
 * @see Telnyx\Services\DirService::update()
 *
 * @phpstan-type DirUpdateParamsShape = array{
 *   authorizerEmail?: string|null,
 *   authorizerName?: string|null,
 *   callReasons?: list<string>|null,
 *   displayName?: string|null,
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
     * Name shown to call recipients. 1–35 characters, no emoji, not whitespace-only.
     */
    #[Optional('display_name')]
    public ?string $displayName;

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
     */
    public static function with(
        ?string $authorizerEmail = null,
        ?string $authorizerName = null,
        ?array $callReasons = null,
        ?string $displayName = null,
        ?string $logoURL = null,
        ?bool $reselling = null,
    ): self {
        $self = new self;

        null !== $authorizerEmail && $self['authorizerEmail'] = $authorizerEmail;
        null !== $authorizerName && $self['authorizerName'] = $authorizerName;
        null !== $callReasons && $self['callReasons'] = $callReasons;
        null !== $displayName && $self['displayName'] = $displayName;
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
     * Name shown to call recipients. 1–35 characters, no emoji, not whitespace-only.
     */
    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

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
