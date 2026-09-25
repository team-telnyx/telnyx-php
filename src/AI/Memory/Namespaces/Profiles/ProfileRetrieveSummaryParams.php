<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The whole profile as one card, precomputed, with no query. Built for the start of a session, where there is no question to ask yet.
 *
 * A summary is generated in the background. `is_stale` tells you newer memories have arrived since it was written; that is ordinary and the card is still usable.
 *
 * @see Telnyx\Services\AI\Memory\Namespaces\ProfilesService::retrieveSummary()
 *
 * @phpstan-type ProfileRetrieveSummaryParamsShape = array{namespace: string}
 */
final class ProfileRetrieveSummaryParams implements BaseModel
{
    /** @use SdkModel<ProfileRetrieveSummaryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The namespace. `default` exists for every organization.
     */
    #[Required]
    public string $namespace;

    /**
     * `new ProfileRetrieveSummaryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProfileRetrieveSummaryParams::with(namespace: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProfileRetrieveSummaryParams)->withNamespace(...)
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
     */
    public static function with(string $namespace): self
    {
        $self = new self;

        $self['namespace'] = $namespace;

        return $self;
    }

    /**
     * The namespace. `default` exists for every organization.
     */
    public function withNamespace(string $namespace): self
    {
        $self = clone $this;
        $self['namespace'] = $namespace;

        return $self;
    }
}
