<?php

declare(strict_types=1);

namespace Telnyx\Client\ClientListBucketsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type bucket_alias = array{
 *   creationDate?: \DateTimeInterface|null, name?: string|null
 * }
 */
final class Bucket implements BaseModel
{
    /** @use SdkModel<bucket_alias> */
    use SdkModel;

    #[Api('CreationDate', optional: true)]
    public ?\DateTimeInterface $creationDate;

    #[Api('Name', optional: true)]
    public ?string $name;

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
        ?\DateTimeInterface $creationDate = null,
        ?string $name = null
    ): self {
        $obj = new self;

        null !== $creationDate && $obj->creationDate = $creationDate;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withCreationDate(\DateTimeInterface $creationDate): self
    {
        $obj = clone $this;
        $obj->creationDate = $creationDate;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
