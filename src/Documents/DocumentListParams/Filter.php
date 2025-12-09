<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Documents\DocumentListParams\Filter\CreatedAt;
use Telnyx\Documents\DocumentListParams\Filter\CustomerReference;
use Telnyx\Documents\DocumentListParams\Filter\Filename;

/**
 * Consolidated filter parameter for documents (deepObject style). Originally: filter[filename][contains], filter[customer_reference][eq], filter[customer_reference][in][], filter[created_at][gt], filter[created_at][lt].
 *
 * @phpstan-type FilterShape = array{
 *   createdAt?: CreatedAt|null,
 *   customerReference?: CustomerReference|null,
 *   filename?: Filename|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional('created_at')]
    public ?CreatedAt $createdAt;

    #[Optional('customer_reference')]
    public ?CustomerReference $customerReference;

    #[Optional]
    public ?Filename $filename;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CreatedAt|array{
     *   gt?: \DateTimeInterface|null, lt?: \DateTimeInterface|null
     * } $createdAt
     * @param CustomerReference|array{
     *   eq?: string|null, in?: list<string>|null
     * } $customerReference
     * @param Filename|array{contains?: string|null} $filename
     */
    public static function with(
        CreatedAt|array|null $createdAt = null,
        CustomerReference|array|null $customerReference = null,
        Filename|array|null $filename = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $filename && $self['filename'] = $filename;

        return $self;
    }

    /**
     * @param CreatedAt|array{
     *   gt?: \DateTimeInterface|null, lt?: \DateTimeInterface|null
     * } $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param CustomerReference|array{
     *   eq?: string|null, in?: list<string>|null
     * } $customerReference
     */
    public function withCustomerReference(
        CustomerReference|array $customerReference
    ): self {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * @param Filename|array{contains?: string|null} $filename
     */
    public function withFilename(Filename|array $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }
}
