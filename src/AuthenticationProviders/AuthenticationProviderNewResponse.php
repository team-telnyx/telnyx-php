<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\AuthenticationProviders\AuthenticationProvider\Settings;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AuthenticationProviderNewResponseShape = array{
 *   data?: AuthenticationProvider|null
 * }
 */
final class AuthenticationProviderNewResponse implements BaseModel
{
    /** @use SdkModel<AuthenticationProviderNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?AuthenticationProvider $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AuthenticationProvider|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   createdAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   organizationID?: string|null,
     *   recordType?: string|null,
     *   settings?: Settings|null,
     *   shortName?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(AuthenticationProvider|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param AuthenticationProvider|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   createdAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   organizationID?: string|null,
     *   recordType?: string|null,
     *   settings?: Settings|null,
     *   shortName?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(AuthenticationProvider|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
