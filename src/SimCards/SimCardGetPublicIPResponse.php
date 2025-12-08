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
     *   created_at?: string|null,
     *   ip?: string|null,
     *   record_type?: string|null,
     *   region_code?: string|null,
     *   sim_card_id?: string|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   created_at?: string|null,
     *   ip?: string|null,
     *   record_type?: string|null,
     *   region_code?: string|null,
     *   sim_card_id?: string|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
