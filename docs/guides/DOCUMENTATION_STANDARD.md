# Documentation Standard

Status:
Draft

Version:
0.1

Last Updated:
2026-08-05

---

## Purpose

This document defines the rules for creating and maintaining documentation in PHP Modernizer.

The goal is to keep documentation simple, clear, and useful for current and future contributors.

---

## Documentation Principles

### One Topic Per Document

Each document should focus on one specific subject.

If a document covers multiple topics, it should be divided into smaller documents.

---

### Maximum Two Pages

Documentation should remain short and readable.

If a document becomes longer than two pages, split it into separate documents.

---

### Answer One Question

Every document should answer one main question:

- What is it?
- Why does it exist?
- How does it work?

---

### Avoid Repetition

Do not copy the same information into multiple documents.

Use references and links to related documents instead.

---

### Keep Documents Updated

Documentation must evolve with the project.

When architecture or decisions change, related documents should be reviewed.

---

## Document Structure

New documents should follow this structure:

```markdown
# Title

Status:
Draft | Review | Approved

Version:
0.1

Last Updated:
YYYY-MM-DD

---

## Purpose

Short explanation of the document goal.

---

## Details

Main content.

---

## Related Documents

Links to related documentation.
```

---

## Documentation Types

| Directory | Usage |
|-----------|-------|
| architecture/ | System design and technical structure |
| decisions/ | Important design decisions |
| guides/ | Rules and development guidelines |
| ideas/ | Future concepts and research |
| project/ | Current project information |
| roadmap/ | Future plans and milestones |
| sessions/ | Development history |

---

## Review Before Commit

Before adding documentation:

- Is the purpose clear?
- Is the document focused on one topic?
- Can it be understood quickly?
- Is there unnecessary text?
- Are related documents referenced?

---

## Goal

PHP Modernizer documentation should be:

- Simple
- Short
- Clear
- Maintainable
- Useful for future contributors