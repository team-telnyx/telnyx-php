<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\AuthenticationProviders\AuthenticationProvider\Settings;
use Telnyx\Core\Attributes\Api;
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

    #[Api(optional: true)]
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
     *   created_at?: \DateTimeInterface|null,
     *   name?: string|null,
     *   organization_id?: string|null,
     *   record_type?: string|null,
     *   settings?: Settings|null,
     *   short_name?: string|null,
     *   updated_at?: \DateTimeInterface|null,
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
     *   created_at?: \DateTimeInterface|null,
     *   name?: string|null,
     *   organization_id?: string|null,
     *   record_type?: string|null,
     *   settings?: Settings|null,
     *   short_name?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(AuthenticationProvider|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
