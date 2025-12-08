<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfig\Op;

/**
 * @phpstan-type AutoRespConfigResponseShape = array{data: AutoRespConfig}
 */
final class AutoRespConfigResponse implements BaseModel
{
    /** @use SdkModel<AutoRespConfigResponseShape> */
    use SdkModel;

    #[Required]
    public AutoRespConfig $data;

    /**
     * `new AutoRespConfigResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutoRespConfigResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutoRespConfigResponse)->withData(...)
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
     * @param AutoRespConfig|array{
     *   id: string,
     *   country_code: string,
     *   created_at: \DateTimeInterface,
     *   keywords: list<string>,
     *   op: value-of<Op>,
     *   updated_at: \DateTimeInterface,
     *   resp_text?: string|null,
     * } $data
     */
    public static function with(AutoRespConfig|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param AutoRespConfig|array{
     *   id: string,
     *   country_code: string,
     *   created_at: \DateTimeInterface,
     *   keywords: list<string>,
     *   op: value-of<Op>,
     *   updated_at: \DateTimeInterface,
     *   resp_text?: string|null,
     * } $data
     */
    public function withData(AutoRespConfig|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
