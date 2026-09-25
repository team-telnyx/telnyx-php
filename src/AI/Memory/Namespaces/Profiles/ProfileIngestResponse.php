<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles;

use Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestResponse\Data
 *
 * @phpstan-type ProfileIngestResponseShape = array{data: Data|DataShape}
 */
final class ProfileIngestResponse implements BaseModel
{
    /** @use SdkModel<ProfileIngestResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new ProfileIngestResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProfileIngestResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProfileIngestResponse)->withData(...)
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
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
