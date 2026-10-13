<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportGuardrailEvaluation;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest;

/**
 * @phpstan-import-type UsageExportInferenceRequestShape from \Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest
 * @phpstan-import-type UsageExportGuardrailEvaluationShape from \Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportGuardrailEvaluation
 *
 * @phpstan-type DataVariants = UsageExportInferenceRequest|UsageExportGuardrailEvaluation
 * @phpstan-type DataShape = DataVariants|UsageExportInferenceRequestShape|UsageExportGuardrailEvaluationShape
 */
final class Data implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'inference.request' => UsageExportInferenceRequest::class,
            'guardrail.evaluation' => UsageExportGuardrailEvaluation::class,
        ];
    }
}
