<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Settings;

use Telnyx\AI\Memory\Namespaces\Settings\NamespaceSettingsResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\AI\Memory\Namespaces\Settings\NamespaceSettingsResponse\Data
 *
 * @phpstan-type NamespaceSettingsResponseShape = array{data: Data|DataShape}
 */
final class NamespaceSettingsResponse implements BaseModel
{
    /** @use SdkModel<NamespaceSettingsResponseShape> */
    use SdkModel;

    /**
     * A namespace's settings, grouped by what they affect.
     */
    #[Required]
    public Data $data;

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
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * A namespace's settings, grouped by what they affect.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
