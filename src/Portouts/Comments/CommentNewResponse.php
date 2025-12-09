<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Comments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Comments\CommentNewResponse\Data;

/**
 * @phpstan-type CommentNewResponseShape = array{data?: Data|null}
 */
final class CommentNewResponse implements BaseModel
{
    /** @use SdkModel<CommentNewResponseShape> */
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
     *   id: string,
     *   body: string,
     *   createdAt: string,
     *   userID: string,
     *   portoutID?: string|null,
     *   recordType?: string|null,
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
     *   id: string,
     *   body: string,
     *   createdAt: string,
     *   userID: string,
     *   portoutID?: string|null,
     *   recordType?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
