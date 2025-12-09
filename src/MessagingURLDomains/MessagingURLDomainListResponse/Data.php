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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $urlDomain && $obj['urlDomain'] = $urlDomain;
        null !== $useCase && $obj['useCase'] = $useCase;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    public function withURLDomain(string $urlDomain): self
    {
        $obj = clone $this;
        $obj['urlDomain'] = $urlDomain;

        return $obj;
    }

    public function withUseCase(string $useCase): self
    {
        $obj = clone $this;
        $obj['useCase'] = $useCase;

        return $obj;
    }
}
