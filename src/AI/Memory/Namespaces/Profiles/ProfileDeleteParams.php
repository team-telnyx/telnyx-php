<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Delete everything held about one profile. A 2xx means none of its memories are left, and its summary goes with them. There is no undo.
 *
 * @see Telnyx\Services\AI\Memory\Namespaces\ProfilesService::delete()
 *
 * @phpstan-type ProfileDeleteParamsShape = array{namespace: string}
 */
final class ProfileDeleteParams implements BaseModel
{
    /** @use SdkModel<ProfileDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The namespace. `default` exists for every organization.
     */
    #[Required]
    public string $namespace;

    /**
     * `new ProfileDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProfileDeleteParams::with(namespace: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProfileDeleteParams)->withNamespace(...)
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
