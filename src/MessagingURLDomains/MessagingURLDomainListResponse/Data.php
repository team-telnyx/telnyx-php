<?php

declare(strict_types=1);

namespace Telnyx\MessagingURLDomains\MessagingURLDomainListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   record_type?: string|null,
 *   url_domain?: string|null,
 *   use_case?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $record_type;

    #[Optional]
    public ?string $url_domain;

    #[Optional]
    public ?string $use_case;

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
        ?string $record_type = null,
        ?string $url_domain = null,
        ?string $use_case = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $url_domain && $obj['url_domain'] = $url_domain;
        null !== $use_case && $obj['use_case'] = $use_case;

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
        $obj['record_type'] = $recordType;

        return $obj;
    }

    public function withURLDomain(string $urlDomain): self
    {
        $obj = clone $this;
        $obj['url_domain'] = $urlDomain;

        return $obj;
    }

    public function withUseCase(string $useCase): self
    {
        $obj = clone $this;
        $obj['use_case'] = $useCase;

        return $obj;
    }
}
