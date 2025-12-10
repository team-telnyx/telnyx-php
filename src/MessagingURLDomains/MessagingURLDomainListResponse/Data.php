<?php

declare(strict_types=1);

namespace Telnyx\MessagingURLDomains\MessagingURLDomainListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   recordType?: string|null,
 *   urlDomain?: string|null,
 *   useCase?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('url_domain')]
    public ?string $urlDomain;

    #[Optional('use_case')]
    public ?string $useCase;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $id = null,
        ?string $recordType = null,
        ?string $urlDomain = null,
        ?string $useCase = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $urlDomain && $self['urlDomain'] = $urlDomain;
        null !== $useCase && $self['useCase'] = $useCase;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withURLDomain(string $urlDomain): self
    {
        $self = clone $this;
        $self['urlDomain'] = $urlDomain;

        return $self;
    }

    public function withUseCase(string $useCase): self
    {
        $self = clone $this;
        $self['useCase'] = $useCase;

        return $self;
    }
}
