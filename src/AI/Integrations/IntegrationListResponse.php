<?php

declare(strict_types=1);

namespace Telnyx\AI\Integrations;

use Telnyx\AI\Integrations\IntegrationListResponse\Data;
use Telnyx\AI\Integrations\IntegrationListResponse\Data\Status;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type IntegrationListResponseShape = array{data: list<Data>}
 */
final class IntegrationListResponse implements BaseModel
{
    /** @use SdkModel<IntegrationListResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    /**
     * `new IntegrationListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegrationListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegrationListResponse)->withData(...)
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
     * @param list<Data|array{
     *   id: string,
     *   available_tools: list<string>,
     *   description: string,
     *   display_name: string,
     *   logo_url: string,
     *   name: string,
     *   status: value-of<Status>,
     * }> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id: string,
     *   available_tools: list<string>,
     *   description: string,
     *   display_name: string,
     *   logo_url: string,
     *   name: string,
     *   status: value-of<Status>,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
