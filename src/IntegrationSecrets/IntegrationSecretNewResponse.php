<?php

declare(strict_types=1);

namespace Telnyx\IntegrationSecrets;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type IntegrationSecretNewResponseShape = array{data: IntegrationSecret}
 */
final class IntegrationSecretNewResponse implements BaseModel
{
    /** @use SdkModel<IntegrationSecretNewResponseShape> */
    use SdkModel;

    #[Required]
    public IntegrationSecret $data;

    /**
     * `new IntegrationSecretNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegrationSecretNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegrationSecretNewResponse)->withData(...)
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
     * @param IntegrationSecret|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   identifier: string,
     *   recordType: string,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(IntegrationSecret|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param IntegrationSecret|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   identifier: string,
     *   recordType: string,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(IntegrationSecret|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
