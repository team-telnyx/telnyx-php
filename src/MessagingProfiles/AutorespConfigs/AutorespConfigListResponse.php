<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfig\Op;

/**
 * List of Auto-Response Settings.
 *
 * @phpstan-type AutorespConfigListResponseShape = array{
 *   data: list<AutoRespConfig>, meta: PaginationMeta
 * }
 */
final class AutorespConfigListResponse implements BaseModel
{
    /** @use SdkModel<AutorespConfigListResponseShape> */
    use SdkModel;

    /** @var list<AutoRespConfig> $data */
    #[Required(list: AutoRespConfig::class)]
    public array $data;

    #[Required]
    public PaginationMeta $meta;

    /**
     * `new AutorespConfigListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutorespConfigListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutorespConfigListResponse)->withData(...)->withMeta(...)
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
     * @param list<AutoRespConfig|array{
     *   id: string,
     *   country_code: string,
     *   created_at: \DateTimeInterface,
     *   keywords: list<string>,
     *   op: value-of<Op>,
     *   updated_at: \DateTimeInterface,
     *   resp_text?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(array $data, PaginationMeta|array $meta): self
    {
        $obj = new self;

        $obj['data'] = $data;
        $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<AutoRespConfig|array{
     *   id: string,
     *   country_code: string,
     *   created_at: \DateTimeInterface,
     *   keywords: list<string>,
     *   op: value-of<Op>,
     *   updated_at: \DateTimeInterface,
     *   resp_text?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
