<?php

declare(strict_types=1);

namespace Telnyx\MessagingURLDomains\MessagingURLDomainListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   id?: string|null,
 *   recordType?: string|null,
 *   urlDomain?: string|null,
 *   useCase?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    #[Api('url_domain', optional: true)]
    public ?string $urlDomain;

    #[Api('use_case', optional: true)]
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

        null !== $id && $obj->id = $id;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $urlDomain && $obj->urlDomain = $urlDomain;
        null !== $useCase && $obj->useCase = $useCase;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    public function withURLDomain(string $urlDomain): self
    {
        $obj = clone $this;
        $obj->urlDomain = $urlDomain;

        return $obj;
    }

    public function withUseCase(string $useCase): self
    {
        $obj = clone $this;
        $obj->useCase = $useCase;

        return $obj;
    }
}
