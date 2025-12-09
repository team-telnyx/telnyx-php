<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardGetPublicIPResponse\Data;
use Telnyx\SimCards\SimCardGetPublicIPResponse\Data\Type;

/**
 * @phpstan-type SimCardGetPublicIPResponseShape = array{data?: Data|null}
 */
final class SimCardGetPublicIPResponse implements BaseModel
{
    /** @use SdkModel<SimCardGetPublicIPResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   createdAt?: string|null,
     *   ip?: string|null,
     *   recordType?: string|null,
     *   regionCode?: string|null,
     *   simCardID?: string|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   createdAt?: string|null,
     *   ip?: string|null,
     *   recordType?: string|null,
     *   regionCode?: string|null,
     *   simCardID?: string|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
