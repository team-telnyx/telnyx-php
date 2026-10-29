<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Settings;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NamespaceSettingsShape from \Telnyx\AI\Memory\Namespaces\Settings\NamespaceSettings
 *
 * @phpstan-type NamespaceSettingsResponseShape = array{
 *   data: NamespaceSettings|NamespaceSettingsShape
 * }
 */
final class NamespaceSettingsResponse implements BaseModel
{
    /** @use SdkModel<NamespaceSettingsResponseShape> */
    use SdkModel;

    /**
     * A namespace's settings, grouped by what they affect.
     */
    #[Required]
    public NamespaceSettings $data;

    /**
     * `new NamespaceSettingsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NamespaceSettingsResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NamespaceSettingsResponse)->withData(...)
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
     * @param NamespaceSettings|NamespaceSettingsShape $data
     */
    public static function with(NamespaceSettings|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * A namespace's settings, grouped by what they affect.
     *
     * @param NamespaceSettings|NamespaceSettingsShape $data
     */
    public function withData(NamespaceSettings|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
