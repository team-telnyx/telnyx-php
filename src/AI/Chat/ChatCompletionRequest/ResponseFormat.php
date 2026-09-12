<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCompletionRequest;

use Telnyx\AI\Chat\ChatCompletionRequest\ResponseFormat\ResponseFormatJsonObject;
use Telnyx\AI\Chat\ChatCompletionRequest\ResponseFormat\ResponseFormatJsonSchemaParam;
use Telnyx\AI\Chat\ChatCompletionRequest\ResponseFormat\ResponseFormatText;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Controls the format of the model output. `json_object` guarantees valid JSON output without defining a schema; `json_schema` constrains the output to the JSON schema you supply via the `json_schema` property and is the supported way to get guaranteed structured output on Telnyx-hosted models.
 *
 * @phpstan-import-type ResponseFormatTextShape from \Telnyx\AI\Chat\ChatCompletionRequest\ResponseFormat\ResponseFormatText
 * @phpstan-import-type ResponseFormatJsonObjectShape from \Telnyx\AI\Chat\ChatCompletionRequest\ResponseFormat\ResponseFormatJsonObject
 * @phpstan-import-type ResponseFormatJsonSchemaParamShape from \Telnyx\AI\Chat\ChatCompletionRequest\ResponseFormat\ResponseFormatJsonSchemaParam
 *
 * @phpstan-type ResponseFormatVariants = ResponseFormatText|ResponseFormatJsonObject|ResponseFormatJsonSchemaParam
 * @phpstan-type ResponseFormatShape = ResponseFormatVariants|ResponseFormatTextShape|ResponseFormatJsonObjectShape|ResponseFormatJsonSchemaParamShape
 */
final class ResponseFormat implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            ResponseFormatText::class,
            ResponseFormatJsonObject::class,
            ResponseFormatJsonSchemaParam::class,
        ];
    }
}
