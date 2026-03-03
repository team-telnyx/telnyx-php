<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\Metadata;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SessionAnalysis\Metadata\MetadataGetResponse\Meta;
use Telnyx\SessionAnalysis\Metadata\MetadataGetResponse\QueryParameter;
use Telnyx\SessionAnalysis\Metadata\MetadataGetResponse\RecordType;

/**
 * @phpstan-import-type MetaShape from \Telnyx\SessionAnalysis\Metadata\MetadataGetResponse\Meta
 * @phpstan-import-type QueryParameterShape from \Telnyx\SessionAnalysis\Metadata\MetadataGetResponse\QueryParameter
 * @phpstan-import-type RecordTypeShape from \Telnyx\SessionAnalysis\Metadata\MetadataGetResponse\RecordType
 *
 * @phpstan-type MetadataGetResponseShape = array{
 *   meta: Meta|MetaShape,
 *   queryParameters: array<string,QueryParameter|QueryParameterShape>,
 *   recordTypes: list<RecordType|RecordTypeShape>,
 * }
 */
final class MetadataGetResponse implements BaseModel
{
    /** @use SdkModel<MetadataGetResponseShape> */
    use SdkModel;

    #[Required]
    public Meta $meta;

    /**
     * Map of supported query parameter names to their definitions.
     *
     * @var array<string,QueryParameter> $queryParameters
     */
    #[Required('query_parameters', map: QueryParameter::class)]
    public array $queryParameters;

    /** @var list<RecordType> $recordTypes */
    #[Required('record_types', list: RecordType::class)]
    public array $recordTypes;

    /**
     * `new MetadataGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MetadataGetResponse::with(meta: ..., queryParameters: ..., recordTypes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MetadataGetResponse)
     *   ->withMeta(...)
     *   ->withQueryParameters(...)
     *   ->withRecordTypes(...)
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
     * @param Meta|MetaShape $meta
     * @param array<string,QueryParameter|QueryParameterShape> $queryParameters
     * @param list<RecordType|RecordTypeShape> $recordTypes
     */
    public static function with(
        Meta|array $meta,
        array $queryParameters,
        array $recordTypes
    ): self {
        $self = new self;

        $self['meta'] = $meta;
        $self['queryParameters'] = $queryParameters;
        $self['recordTypes'] = $recordTypes;

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

    /**
     * Map of supported query parameter names to their definitions.
     *
     * @param array<string,QueryParameter|QueryParameterShape> $queryParameters
     */
    public function withQueryParameters(array $queryParameters): self
    {
        $self = clone $this;
        $self['queryParameters'] = $queryParameters;

        return $self;
    }

    /**
     * @param list<RecordType|RecordTypeShape> $recordTypes
     */
    public function withRecordTypes(array $recordTypes): self
    {
        $self = clone $this;
        $self['recordTypes'] = $recordTypes;

        return $self;
    }
}
