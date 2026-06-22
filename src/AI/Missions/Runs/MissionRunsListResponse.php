<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MissionRunDataShape from \Telnyx\AI\Missions\Runs\MissionRunData
 * @phpstan-import-type MetaShape from \Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta
 *
 * @phpstan-type MissionRunsListResponseShape = array{
 *   data: list<MissionRunData|MissionRunDataShape>, meta: Meta|MetaShape
 * }
 */
final class MissionRunsListResponse implements BaseModel
{
    /** @use SdkModel<MissionRunsListResponseShape> */
    use SdkModel;

    /** @var list<MissionRunData> $data */
    #[Required(list: MissionRunData::class)]
    public array $data;

    #[Required]
    public Meta $meta;

    /**
     * `new MissionRunsListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MissionRunsListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MissionRunsListResponse)->withData(...)->withMeta(...)
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
     * @param list<MissionRunData|MissionRunDataShape> $data
     * @param Meta|MetaShape $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<MissionRunData|MissionRunDataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
