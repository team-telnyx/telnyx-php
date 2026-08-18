#!/usr/bin/env python3
"""Durability contracts for production-owned DOT-2061 PHP policy."""
import unittest
from pathlib import Path

ROOT = Path(__file__).resolve().parents[2]


class PromoteToProdContractTests(unittest.TestCase):
    def test_phase1_release_gate_is_restored_from_production_master(self):
        workflow = (ROOT / ".github/workflows/promote-to-prod.yml").read_text()
        for path in {
            ".github/workflows/release-pr-readiness.yml",
            ".github/workflows/next-readiness.yml",
            ".github/scripts/classify_production_ci.py",
            ".github/scripts/test_classify_production_ci.py",
            ".github/scripts/validate_next_provenance.py",
            ".github/scripts/test_validate_next_provenance.py",
            ".github/scripts/verify_packagist_release.py",
            ".github/scripts/test_verify_packagist_release.py",
            ".github/scripts/test_release_pr_ci_gate.py",
        }:
            self.assertIn(path, workflow)
        self.assertIn('git cat-file -e "origin/master:$path"', workflow)
        self.assertIn('git checkout origin/master -- "$path"', workflow)


if __name__ == "__main__":
    unittest.main()
